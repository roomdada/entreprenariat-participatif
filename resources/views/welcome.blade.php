  @extends('layouts.main')
  @section('content')
      <main>
          <!-- Hero section -->
          <div class="relative">
              <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
                      <div class="absolute inset-0">
                          <img class="h-full w-full object-cover"
                              src="https://www.africatopsuccess.com/wp-content/uploads/2017/03/businessteam.jpg"
                              alt="People working on laptops">
                          <div class="absolute inset-0 bg-gradient-to-r from-green-200 to-indigo-400 mix-blend-multiply">
                          </div>
                      </div>
                      <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                          <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                              <span class="block text-white">Deviens entrepreneur</span>
                              <span class="block text-indigo-200">avec {{ config('app.name') }}</span>
                          </h1>
                          <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">Notre
                              plateforme permet aux porteurs de projet innovant de trouver des financements pariticipatif
                              afin de lancer plus vite leur projet.</p>
                          <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                              <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                                  <a href="#"
                                      class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">Ouvrir
                                      un compte</a>
                                  <a href="#"
                                      class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">Projets</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </main>

      <x-about-section />

      <!-- ====== Portfolio Section Start -->
      <x-project-list/>
     
      <!-- ====== FAQ Section Start -->
      <x-faq-card/>
  @stop
