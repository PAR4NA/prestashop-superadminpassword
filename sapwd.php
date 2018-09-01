<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SAPWD - Reset/Change the PrestaShop Super Admin password</title>
    <meta name="author" content="Yeromnis">
    <meta name="robots" content="noindex, nofollow">
  <body>
    <h3>Reset/Change the PrestaShop 1.7 Super Admin Password</h3>

    <?php
      echo "Loading PrestaShop config parameters... ";
      $config = include('app/config/parameters.php');
      $parameters = $config['parameters'];
      if (!isset($parameters)) {
        die("ERROR! Invalid config file.<br/>");
      }
      else {
        echo ("OK<br/>");
      }
      echo "Connecting to the database... ";
      try  {
        $pdo = new PDO('mysql:host='.$parameters['database_host'].';port='.$parameters['database_port'].';dbname='.$parameters['database_name'], $parameters['database_user'], $parameters['database_password']);
        echo ("OK<br/>");
        echo ("Reading Super Admin (employee id=1) data... ");
        $res = $pdo->query('SELECT * FROM '.$parameters['database_prefix'].'employee WHERE id_employee=1')->fetch(PDO::FETCH_ASSOC);
        if (!$res) die("ERROR! Admin account not found in the database.<br/>");
        echo ("OK<br/>");
        echo ("Admin email/login: <strong>".$res['email']."</strong><br/>");
      } catch (PDOException $e) {
        die("ERROR! ".$e->getMessage()."<br/>");
      }
    ?>

    <?php
      $pwd = isset($_GET['pwd']) ? $_GET['pwd'] : '';
      if (empty($pwd)) {
    ?>
      <p>
        <form>
          <label for="pwd">Wished new password:</label>
          <input name="pwd" type="text" pattern=".{5,}" required placeholder="5 characters minimum" />
          <input type="submit" value="OK" />
        </form>
      </p>
    <?php } else {
      if (strlen($pwd) < 5) {
        http_response_code(400);
        die("ERROR! Invalid wished password, 5 characters minimum.");
      }
      $newpassword = password_hash($pwd, PASSWORD_BCRYPT);
      echo "Updating the password... ";
      try  {
        $pdo->beginTransaction();
        $res = $pdo->prepare('UPDATE '.$parameters['database_prefix'].'employee SET passwd=:newpassword WHERE id_employee=1')->execute(array('newpassword'=>$newpassword));
        $pdo->commit();
        echo ("OK<br/><strong>Done!</strong>");
      } catch (PDOException $e) {
        $pdo->rollback();
        die("ERROR! ".$e->getMessage()."<br/>");
      }
    };
    ?>

  </body>
</html>
