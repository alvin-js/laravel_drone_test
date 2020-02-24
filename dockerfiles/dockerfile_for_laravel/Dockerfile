FROM virtualorz/dev_compose_php73_laravel

COPY . /var/project
COPY ./.env.example /var/project/.env
RUN cd /var/project
CMD bash -c "composer install"

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
