FROM httpd:2.4
MAINTAINER fei

RUN sed -i \
		-e 's/^#\(Include .*httpd-vhosts.conf\)/\1/' \
		-e 's/^#\(LoadModule .*mod_proxy.so\)/\1/' \
		-e 's/^#\(LoadModule .*mod_proxy_fcgi.so\)/\1/' \
		-e 's/^#\(LoadModule .*mod_rewrite.so\)/\1/' \
		conf/httpd.conf

RUN echo "ServerName crud" >> conf/httpd.conf

COPY infrastructure/httpd/apache-config.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf

CMD httpd-foreground