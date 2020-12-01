from django.urls import path
from django.conf.urls import url
from films import views 
 
urlpatterns = [
    path('films/', views.FilmList.as_view(), name='film-list'),
    path('films/<int:pk>/', views.FilmDetail.as_view(), name='film-detail'),
    path('films/<int:pk>/', views.FilmHighlight.as_view(), name='film-highlight'),

    # url(r'^films/$', views.films_list),
    # url(r'^films/(?P<pk>[0-9]+)$', views.film_detail),
]