# Generated by Django 3.0.7 on 2020-06-20 10:55

from django.db import migrations, models
import django.utils.timezone


class Migration(migrations.Migration):

    dependencies = [
        ('myapi', '0011_movie_type'),
    ]

    operations = [
        migrations.AddField(
            model_name='movie',
            name='actors',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='awards',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='boxoffice',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='country',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='date_added',
            field=models.DateTimeField(auto_now_add=True, default=django.utils.timezone.now),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='movie',
            name='director',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='dvd',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='genre',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='imdbrating',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='imdbvotes',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='language',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='metascore',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='plot',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='poster',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='production',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='rated',
            field=models.CharField(max_length=10, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='released',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='runtime',
            field=models.CharField(max_length=255, null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='website',
            field=models.TextField(null=True),
        ),
        migrations.AddField(
            model_name='movie',
            name='writer',
            field=models.TextField(null=True),
        ),
    ]
