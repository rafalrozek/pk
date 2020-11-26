from django.db import models


class Film(models.Model):
    title = models.CharField(max_length=255, unique=True)
    released = models.CharField(max_length=255, null=True)
    runtime = models.CharField(max_length=255, null=True)
    genre = models.CharField(max_length=255, null=True)
    director = models.TextField(null=True)

    def __str__(self):
        return self.title
