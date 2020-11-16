from django.db import models


class Film(models.Model):
    title = models.CharField(max_length=255, unique=True)
    released = models.CharField(max_length=255, null=True)
    runtime = models.CharField(max_length=255, null=True)
    genre = models.CharField(max_length=255, null=True)
    director = models.TextField(null=True)
    actors = models.TextField(null=True)
    plot = models.TextField(null=True)
    poster = models.TextField(null=True)

    def __str__(self):
        return self.title


class Review(models.Model):
    movie_id = models.CharField(max_length=255, unique=False)
    content = models.TextField()

    def __str__(self):
        return self.content
