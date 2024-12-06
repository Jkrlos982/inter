# frontend/Dockerfile

FROM node:18-alpine

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar los archivos de la aplicación
COPY package*.json ./

# Instalar dependencias
RUN npm install

# Copiar el resto de la aplicación
COPY . .

# Crear la build de producción
RUN npm run build

# Exponer puerto
EXPOSE 3000

# Comando por defecto para iniciar la aplicación
CMD ["npm", "start"]
