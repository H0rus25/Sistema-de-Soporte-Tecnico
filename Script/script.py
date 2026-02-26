import mysql.connector
import time
import os

time.sleep(10)

conexion = mysql.connector.connect(
    host="Soporte Tecnico",  #nombre que tendra nuestro servicio en docker-compose
    user="root",
    password="rootpassword",
    database="soporte_tecnico"
)

cursor = conexion.cursor()

cursor.execute("SELECT COUNT(*) FROM tickets")
resultado = cursor.fetchone()

total_tickets = resultado[0]

#Creamos la carpeta que se compartira entre contenedores por sino existe
os.makedirs("shared", exist_ok=True)

#Generamos el archivo de reportes y escribimos sobre este
with open("shared/reporte.txt", "w") as archivo:
    archivo.write("REPORTE DE SOPORTE TECNICO\n")
    archivo.write(f"Total de tickets creados: {total_tickets}\n")

print("Reporte generado correctamente.")

cursor.close()
conexion.close()