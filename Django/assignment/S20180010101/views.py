from django.shortcuts import render,redirect
from .forms import UserRegisterForm
from django.contrib.auth.decorators import login_required
from django.contrib import messages

def home(request):
    return render(request, 'soad/home.html')
   
def register(request): 
    if request.method == 'POST':
        form = UserRegisterForm(request.POST)
        if form.is_valid():
            form.save()
            username = form.cleaned_data.get('username')
            messages.success(request, f'Account created for {username}!')
            return redirect('soad/login.html')
    else:
        form = UserRegisterForm()
    return render(request, 'soad/register.html', {'form': form})

@login_required
def welcome(request):
    return render(request, 'soad/welcome.html')

