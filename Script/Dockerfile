FROM python:3.11-slim

WORKDIR / app

#Se instala esta libreria
RUN pip install mysql-connector-python

#se copia el script 
COPY script.py .

#Se ejecuta el script.py 
CMD ["sh", "-c", "while true; do python script.py; sleep 30; done"]