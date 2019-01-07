# Fingerprint Attendance
Fingerprint Attendance System by Adib Bazli, powered by ESP8266

## Getting Started
This Fingerprint Attendance System was used as School Project.
It is using Arduino (or Arduino-like, eg ESP8266) and PHP as Backend.
This project will use 

### Prerequisites
This project is using 
```
• ESP8266 based WEMOS D1 R2
• DY50 as Fingerprint Sensor.
```
You can buy them at local store or e-commerce such as AliExpress, you also can use Arduino as the board.

### Important
This project rely on network connection heavily, if you plan to buy Arduino, make sure you also buy a Network Module. This project use ESP8266 WiFi Module. You can use either or both of
```
WiFi Module, or
Ethernet Module
```

### Installing
To run this project, you will need 
```
• [Arduino Compiler](https://www.arduino.cc) with ESP8266 board library installed.
• [FPM](https://github.com/brianrho/FPM)
• CH340 USB-Serial Driver
• Apache Server with PHP 7.1
• MySQL
```

Extract **src** content into your **www** directory and run **ad_39.sql** to create the database.

## Running the tests
If plan to run a test directly from source, there is several change that you need to made.

### Changing your host
Please make sure that you've change your system host from your machine which is
```
"C:\Windows\System32\drivers\etc\hosts" - for Windows

[server:ip]	iktihad-malaysia.com.my
[arduino:ip]	iktihad.com
```
Please be noted that your device should be on same network. Minor change, however can be made for the project to run over the internet.

### Known Issue
There is an issue with the board pin, this project will use softwareserial, however the library is made for Arduino. This can be resolve by
```
Connect the Rx and Tx of the Fingerprint Sensor to the following Pin
Rx -> 3
Tx -> 4
```
Make sure the Rx and Tx value from the source code is set to
```
SoftwareSerial mySerial(4,5);
```
Make sure the compiler is
```
Compiler - ESP8266 Board -> Wemos D1 R2
```

## Deployment
To simulate it in real world environment, you will need a monitor with touchscreen capability as the GUI. PHP will serve as the backend and HTML as the frontend.

### Sitemap
```
iktihad-malaysia.com.my - Admin Dashboard
iktihad.com - Arduino GUI
```

### Password
The password for Admin Dashboard is
```
admin:makannasi
```
You can change the password at */staff.php*.

### Reset Password
You also can reset the password. Please setup MSMTP beforehand and change your admin email to your email (receiver email).

## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Staff
* **Adib Bazli** - *Author and Design*
* **Aiman Haziq** - *Front-end and Design*
* **Syahir Rusyaidi** - *Front-end and Front-end Design*
* **Faizul Azli** - *Lecture and Advisor* 

## Acknowledgements
This project use several other open-sourced code. Please contact me if you want or need for me to put the credit.