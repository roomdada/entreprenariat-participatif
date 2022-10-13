<section x-data="{
  showCards: 'all',
  activeClasses: 'bg-primary text-white',
  inactiveClasses: 'text-body-color hover:bg-primary hover:text-white',
  }" class="pt-20 lg:pt-[120px] pb-12 lg:pb-[90px]">
  <div class="container">
     <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
           <div class="text-center mx-auto mb-[60px] max-w-[510px]">
              <h2
                 class="
                 font-bold
                 text-3xl
                 sm:text-4xl
                 md:text-[40px]
                 text-dark
                 mb-4
                 ">
                 Nos projets
              </h2>
              <p class="text-base text-body-color">
                 Parcourir nos projets dans differents domaines et investissez participer en tant
                 qu'entrepreneur ou investisseur.
              </p>
           </div>
        </div>
     </div>
     <div class="flex flex-wrap justify-center -mx-4">
        <div class="w-full px-4">
           <ul class="flex flex-wrap justify-center mb-12 space-x-1">
              <li class="mb-1">
                 <button @click="showCards = 'all' "
                    :class="showCards == 'all' ? activeClasses : inactiveClasses"
                    class="
                    inline-block
                    py-2
                    md:py-3
                    px-5
                    lg:px-8
                    rounded-lg
                    text-base
                    font-semibold
                    text-center
                    transition
                    ">
                 Tous nos projets
                 </button>
              </li>
              @foreach(\App\Models\Domaine::all() as $domaine)
              <li class="mb-1">
                 <button @click="showCards = '{{ $domaine->name }}' "
                    :class="showCards == '{{ $domaine->name }}' ? activeClasses : inactiveClasses"
                    class="
                    inline-block
                    py-2
                    md:py-3
                    px-5
                    lg:px-8
                    rounded-lg
                    text-base
                    font-semibold
                    text-center
                    transition
                    ">
                    {{ $domaine->name }}
                 </button>
              </li>
              @endforeach
 
           </ul>
        </div>
     </div>
     <div class="flex flex-wrap -mx-4">
        @foreach(\App\Models\Project::all() as $project)
        <div :class="showCards == 'all' || showCards == '{{ $project->domaine->name }}' ? 'block' : 'hidden'"
           class="w-full md:w-1/2 xl:w-1/3 px-4">
           <div class="relative mb-12">
              <div class="rounded-lg overflow-hidden">
                 <img src="https://cdn.tailgrids.com/1.0/assets/images/portfolio/portfolio-01/image-01.jpg"
                    alt="portfolio" class="w-full" />
              </div>
              <div
                 class="
                 text-center
                 bg-white
                 relative
                 z-10
                 py-9
                 px-3
                 rounded-lg
                 shadow-lg
                 mx-7
                 -mt-20
                 ">
                 <span class="text-sm text-primary font-semibold block mb-2">
                 {{ $project->domaine->name }}
                 </span>
                 <h3 class="font-bold text-xl text-dark mb-4">
                  {{ $project->title }}
                 </h3>
                 <a href="{{ route('project.show', $project) }}"
                    class="
                    text-body-color text-sm
                    font-semibold
                    py-3
                    px-7
                    inline-block
                    border
                    rounded-md
                    hover:bg-primary hover:border-primary hover:text-white
                    transition
                    ">
                 Details du projet
                 </a>
              </div>
           </div>
        </div>
        @endforeach
 
     </div>
  </div>
</section>
