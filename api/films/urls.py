from django.conf.urls import url 
from films import views 
 
urlpatterns = [ 
    url(r'^films/$', views.films_list),
    url(r'^films/(?P<pk>[0-9]+)$', views.film_detail),
]