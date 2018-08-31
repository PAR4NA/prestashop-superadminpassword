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
## Known limitations

According to the very most common situation, the Super Admin is here arbitrarily supposed to be:
* the 'id=1' employee in the PrestaShop database (i.e. the very first user created during install, aka the Super Admin)
* the only one Super Admin
despite the PrestaShop features regarding employees management allowing to modify and create several Super Admins.

You may need some changes and/or improvements of the source code to manage specific cases.

## Warning

:warning: **Once the job is done, DO NOT FORGET TO DELETE, MOVE or at least change access rights on `sapwd.php`** :warning: 
