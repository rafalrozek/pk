from django.http import HttpResponse
from django.http.response import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from rest_framework.response import Response
from rest_framework import status, generics, renderers
 
from films.models import Film
from films.serializers import FilmSerializer, FilmSearchByTitleSerializer


class FilmList(generics.ListAPIView):
    queryset = Film.objects.all().order_by('title')
    serializer_class = FilmSearchByTitleSerializer


class FilmDetail(generics.RetrieveDestroyAPIView):
    queryset = Film.objects.all()
    serializer_class = FilmSerializer


class FilmHighlight(generics.GenericAPIView):
    queryset = Film.objects.all()
    renderer_classes = [renderers.StaticHTMLRenderer]

    def get(self, request, *args, **kwargs):
        film = self.get_object()
        return Response(film.highlighted)


@csrf_exempt
def films_list(request):
    if request.method == 'GET':
        films = Film.objects.all()
        films_serializer = FilmSerializer(films, many=True)
        return JsonResponse(films_serializer.data, safe=False)
        # In order to serialize objects, we must set 'safe=False'

 
@csrf_exempt 
def film_detail(request, pk):
    try: 
        film = Film.objects.get(pk=pk) 
    except Film.DoesNotExist: 
        return HttpResponse(status=status.HTTP_404_NOT_FOUND) 
 
    if request.method == 'GET': 
        film_serializer = FilmSerializer(film)
        return JsonResponse(film_serializer.data) 
