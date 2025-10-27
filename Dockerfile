# Path Traversal Lab - Deliberately Vulnerable for Education
FROM php:8.2-apache

LABEL maintainer="Security Lab"
LABEL description="Path Traversal Lab - Educational Purpose Only"

# Install Aikido repository for more up-to-date packages
RUN curl -L -O https://github.com/AikidoSec/firewall-php/releases/download/v1.4.0/aikido-php-firewall.x86_64.deb
RUN dpkg -i -E ./aikido-php-firewall.x86_64.deb

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure PHP for the lab (intentionally permissive for educational purposes)
RUN echo "allow_url_fopen = On" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "allow_url_include = On" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "file_uploads = On" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "upload_max_filesize = 20M" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "post_max_size = 20M" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "phar.readonly = Off" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "display_errors = On" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/lab.ini && \
    echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/lab.ini

# Copy application files
COPY src/ /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Create PHAR file for advanced exploitation exercises
# WORKDIR /var/www/html/phar_examples
# RUN if [ -f create_phar.php ]; then php -d phar.readonly=0 create_phar.php || true; fi

# Return to web root
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -f http://localhost/ || exit 1

# Start Apache in foreground
CMD ["apache2-foreground"]