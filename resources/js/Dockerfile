FROM node:16-alpine

WORKDIR /app/resources/js

RUN npm install

RUN npm run build

COPY . /var/www/html/public

EXPOSE 3000

CMD ["npm", "run", "prod"]
