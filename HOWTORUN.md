# ONErpm Full Stack Challenge

## Dependencies

- Docker
- Docker Compose
- [Installation Help](https://www.nerdlivre.com.br/instalando-docker-e-docker-compose-no-ubuntu-24-04/)
- [Solving permission issue](https://stackoverflow.com/questions/48957195/how-to-fix-docker-got-permission-denied-issue)

## Run application

Set Spotify Web API credentials in .env.dev file before running.

At the root directory, run the follow command:

```
$ docker compose up --build -d && ./init
```

## Access localhost

- [http://localhost](http://localhost)
- [http://localhost/api/track](http://localhost/api/track)