# Generated by Django 3.0.7 on 2020-06-21 11:44

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('myapi', '0023_remove_comment_movie_id'),
    ]

    operations = [
        migrations.AlterField(
            model_name='comment',
            name='id',
            field=models.CharField(max_length=255, primary_key=True, serialize=False),
        ),
    ]
