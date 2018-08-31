# prestashop-superadminpassword
Reset/Change the PrestaShop Super Admin password

:warning: For PrestaShop **1.7 ONLY!** :warning: 

## Installation

Copy the file `sapwd.php` into your PrestaShop folder (at the first level where `index.php` is).

## Usage

* Either load the form then fill and submit it by browsing:

```
http(s)://YourPrestashopFullUrl/sapwd.php
```

* Or set directly your wished new password using your browser or any way you want to execute that HTTP GET request:

```
http(s)://YourPrestashopFullUrl/sapwd.php?pwd=YourSuperAdminNewPassword
```

## Warning

:warning: **Once the job is done, DO NOT FORGET TO DELETE, MOVE or at least change access rights on `sapwd.php`** :warning: 
