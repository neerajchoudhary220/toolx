import mysql.connector
mydb = mysql.connector.connect(
    host="127.0.0.1",
    user="root",
    password=''
)

cursor = mydb.cursor()
cursor.execute("SHOW DATABASES")
test = []
for db in cursor:
    test.append(db)
for x in test:
    print(x)
