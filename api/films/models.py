from django.db import models


class Film(models.Model):
    title = models.CharField(max_length=255, unique=True)
    runtime = models.CharField(max_length=255, null=True)
    reviews = models.CharField(max_length=255, null=True)
    description = models.TextField(null=True)
    release_date = models.DateField(null=True)
    directorId = models.IntegerField(null=True)
    categoryId = models.IntegerField(null=True)

    def __str__(self):
        return self.title
