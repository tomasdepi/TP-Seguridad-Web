FROM ubuntu:18.04

RUN apt-get update && \
	apt-get install -y git apache2 libapache2-mod-security2 && \
    rm -rf /var/lib/apt/lists/*

COPY modsecurity.conf /etc/modsecurity/modsecurity.conf

RUN git clone https://github.com/SpiderLabs/owasp-modsecurity-crs.git && \
    cd owasp-modsecurity-crs && \
    mv crs-setup.conf.example /etc/modsecurity/crs-setup.conf && \
    mv rules/ /etc/modsecurity

COPY security2.conf /etc/apache2/mods-available/security2.conf
COPY apache.conf /etc/apache2/sites-available/apache.conf

RUN a2dissite 000-default.conf
RUN a2ensite apache.conf

RUN a2enmod security2
RUN a2enmod proxy
RUN a2enmod proxy_http
RUN a2enmod proxy_balancer

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]
