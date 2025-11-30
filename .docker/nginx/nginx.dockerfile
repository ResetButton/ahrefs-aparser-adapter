FROM nginx:alpine

RUN apk update
RUN apk add openssl
RUN openssl req -x509 -newkey rsa:4096 -sha256 -days 3650 -nodes -keyout "/home/selfsigned.key" -out "/home/selfsigned.crt" -subj "/CN=localhost"