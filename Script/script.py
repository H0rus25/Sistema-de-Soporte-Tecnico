import mysql.connector
import time
import os

time.sleep(10)

conexion = mysql.connector.connect(
    host="sistema",  #Nombre que tiene nuestro servicio en docker-compose
    user="root",
    password="12345",
    database="soporte_tecnico"
)

cursor = conexion.cursor()

cursor.execute("SELECT COUNT(*) FROM tickets")
resultado = cursor.fetchone()

total_tickets = resultado[0]

#Creamos la carpeta que se compartira entre contenedores por si no existe
os.makedirs("/app/shared", exist_ok=True)

#Generamos el archivo de reportes y escribimos sobre este
with open("/app/shared/reporte.txt", "w") as archivo:
    archivo.write(f"Total de tickets creados: {total_tickets}\n")

print("Reporte generado correctamente.")

cursor.close()
conexion.close()