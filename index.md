# Overlord User API Software
## **Software Description:**
### **Overlord UAPI is a API that deals with registering users and checking if they're valid, the system checks the user's HWID and IP Address to make sure the user given via parameters, correlates to the one in the database, if invalid it returns a formatted json value, otherwise it returns a success message formatted in json.**


*[UAPI]: User Application Programming Interface
*[HWID]: Hardware Identifier
*[IP]: Internet Protocol

## Instructions:
### **Step One: Import users.sql through your phpmyadmin or other software.**
### **Step Two: Fill out your database details in config.php**
### **Step Three: Look below for api request uri's.**

## API URI'S
| URI      | Params | Function |
|----------|--------|----------|
|/api/user.php|?username=&password=&hwid=|Register User with username, password and valid HWID.
|/api/access.php|?username=&password=&hwid=|Checks if user exists, returns information about selected user.
|**MISC:**
|/index.php|?api=0.4|Uncompleted Function, Customise it to whatever you'd like.

## Credits/License
> **Developer: WhistleDev**

> `License is hereby required to be presented in all revisions of the source code, anyone who makes copies, modifies, publishes, patents, uses this software MUST provide the valid original copyright presented on this github page, credit must be kept on the copies of this software, this includes but not limited to; comments in the code specifically asking not to be removed by the author.`
