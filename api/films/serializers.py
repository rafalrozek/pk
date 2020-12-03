from rest_framework import serializers 
from films.models import Film
 
 
class FilmSerializer(serializers.ModelSerializer):
    class Meta:
        model = Film
        fields = (
            'title',
            'runtime',
            'reviews',
            'description',
            'release_date',
            'directorId',
            'categoryId'
        )


class FilmSearchByTitleSerializer(serializers.ModelSerializer):
    class Meta:
        model = Film
        fields = ('title', 'details',)

    details = serializers.HyperlinkedIdentityField(view_name='film-highlight', format='html')