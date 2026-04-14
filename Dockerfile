FROM php:8.2-apache

# Enable Apache rewrite module (for .htaccess routes if needed)
RUN a2enmod rewrite

# Copy project files to Apache web root
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80