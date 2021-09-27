# Author: Jerzy, Fall 2021
# Script automates MySQL contact creation to make any number of custom accounts.
import mysql.connector
import config

DEBUG = 1

# This is the value of the user ID that you want to insert your contact into.
contact_UID = 84

# Establish mysqli connection using extra config.py file (create yourself for security reasons).
mydb = mysql.connector.connect(
                               host = config.MYSQL_HOST,
                               user = config.MYSQL_USER,
                               password = config.MYSQL_PASSWORD,
                               database = config.MYSQL_DATABASE
                               )

# Encapsulates common MySQL statements into a variable.
mycursor = mydb.cursor()

# MySQL Query.
sql = "insert into Contacts (cid,uid,firstName,lastName,PhoneNumber,Email,DateCreated,DateLastLoggedIn) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"

# Fake user credentials to substitute into MySQL for testing.
nameFile = open("names.txt","r")
numberFile = open("numbers.txt","r")
emailFile = open("email.txt","r")

if DEBUG == 1:
    print nameFile.readlines()
    print numberFile.readlines()
    print emailFile.readlines()

# Carry out this query with specified parameters.
while (nameFile.numberOfNames != NULL)
{
    # Input specified parameters into the SQL query.
    # cid,uid,firstName,lastName,PhoneNumber,Email,DateCreated,DateLastLoggedIn
    val = (initial_CID, , )

    # Execute the MySQL statement.
    mycursor.execute(sql, val)

    # Commit the MySQL statement.
    mydb.commit()

    # Get the number of rows in a result set.
    print(mycursor.rowcount, "Record inserted.")
}

# Close files properly.
nameFile.close()
numberFile.close()
emailFile.close()
