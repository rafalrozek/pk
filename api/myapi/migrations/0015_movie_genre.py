# Generated by Django 3.0.7 on 2020-06-20 11:20

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('myapi', '0014_remove_movie_genre'),
    ]

    operations = [
        migrations.AddField(
            model_name='movie',
            name='genre',
            field=models.CharField(max_length=255, null=True),
        ),
    ]
