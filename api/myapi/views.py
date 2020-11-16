from rest_framework import generics, status, renderers, viewsets
from rest_framework.response import Response

from .models import Film, Review
from .serializers import FilmSerializer, FilmSearchByTitleSerializer, ReviewSerializer


class FilmList(generics.ListAPIView):
    queryset = Film.objects.all().order_by('title')
    serializer_class = FilmSearchByTitleSerializer

    def post(self, request):
        serializer = FilmSearchByTitleSerializer(data=request.data)
        if serializer.is_valid(raise_exception=True):
            serialized_film = serializer.save()
        else:
            return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

        return Response(serialized_film.data, status=status.HTTP_201_CREATED)


class FilmDetail(generics.RetrieveDestroyAPIView):
    queryset = Film.objects.all()
    serializer_class = FilmSerializer


class FilmHighlight(generics.GenericAPIView):
    queryset = Film.objects.all()
    renderer_classes = [renderers.StaticHTMLRenderer]

    def get(self, request, *args, **kwargs):
        film = self.get_object()
        return Response(film.highlighted)


class ReviewList(generics.ListAPIView):
    queryset = Review.objects.all().order_by('film_id', 'content')
    serializer_class = ReviewSerializer

    def post(self, request):
        serializer = ReviewSerializer(data=request.data)
        if serializer.is_valid(raise_exception=True):
            serialized_film = serializer.save()
        else:
            return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

        return Response(serialized_film.data, status=status.HTTP_201_CREATED)


class ReviewDetail(generics.RetrieveDestroyAPIView):
    queryset = Review.objects.all()
    serializer_class = ReviewSerializer
