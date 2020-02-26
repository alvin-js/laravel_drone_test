FROM virtualorz/php73_laravel_base

COPY ./composer.json /var/project/composer.json
RUN cd /var/project && composer install --prefer-dist --no-scripts --no-dev --no-autoloader && rm -rf /root/.composer
RUN cd /var/project && composer dump-autoload --no-scripts --no-dev --optimize

COPY . /var/project
COPY ./.env.example /var/project/.env
#RUN cd /var/project && composer install
RUN cd /var/project && php artisan key:generate

RUN chown -R www-data:www-data \
        /var/project/storage \
        /var/project/bootstrap/cache

#supervisor
ADD ./dockerfiles/config/supervisor/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

#crontab
#ADD cron line
ADD ./dockerfiles/config/cron/schedule-cron /etc/cron.d/schedule-cron
#change mod
RUN chmod 0777 /etc/cron.d/schedule-cron
# Apply cron job
RUN crontab /etc/cron.d/schedule-cron
# Create the log file to be able to run tail
RUN touch /var/log/cron.log
## Run the command on container startup
CMD cron && php-fpm && supervisord
