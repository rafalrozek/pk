from django.urls import include, path
from rest_framework import routers
from . import views

router = routers.DefaultRouter()
# router.register(r'reviews', views.ReviewViewSet)

urlpatterns = [
    path('', include(router.urls)),
    path('api-auth/', include('rest_framework.urls', namespace='rest_framework')),

    path('films/', views.FilmList.as_view(), name='film-list'),
    path('films/<int:pk>/', views.FilmDetail.as_view(), name='film-detail'),
    path('films/<int:pk>/', views.FilmHighlight.as_view(), name='film-highlight'),

    path('reviews/', views.ReviewList.as_view(), name='review-list'),
    path('reviews/<int:pk>/', views.ReviewDetail.as_view(), name='review-detail'),
]