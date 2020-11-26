import omdb
from rest_framework import serializers
from rest_framework.exceptions import ValidationError

from .models import Film


class FilmSerializer(serializers.ModelSerializer):
    class Meta:
        model = Film
        fields = (
            'title',
            'released',
            'runtime',
            'genre',
            'director',
        )


class FilmSearchByTitleSerializer(serializers.ModelSerializer):
    class Meta:
        model = Film
        fields = ('title', 'details',)

    details = serializers.HyperlinkedIdentityField(view_name='film-highlight', format='html')

    def save(self, **kwargs):
        omdb.set_default('apikey', '4a41d844')
        omdb.set_default('tomatoes', True)
        film_data = omdb.get(title=f"{self.validated_data['title']}")

        try:
            print(film_data['title'])
        except KeyError:
            raise ValidationError("No such film in OMDB.")

        if Film.objects.filter(title=film_data['title']).exists():
            raise ValidationError("Film with this title already exists in database.")

        film_serializer = FilmSerializer(data=film_data)
        if film_serializer.is_valid():
            film_serializer.save()
            return film_serializer
        else:
            raise ValidationError(film_serializer.errors)
