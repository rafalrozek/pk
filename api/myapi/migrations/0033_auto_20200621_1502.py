# Generated by Django 3.0.7 on 2020-06-21 15:02

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('myapi', '0032_auto_20200621_1501'),
    ]

    operations = [
        migrations.RenameField(
            model_name='comment',
            old_name='id',
            new_name='movie_id',
        ),
    ]
