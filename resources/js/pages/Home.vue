<template>
  <div class="min-h-screen bg-background watercolor-texture">
    <!-- SVG Filters for Paint Effects -->
    <svg class="hidden" width="0" height="0">
      <defs>
        <!-- Rough Paper Texture -->
        <filter id="roughPaper" x="0%" y="0%" width="100%" height="100%">
          <feTurbulence baseFrequency="0.04" numOctaves="3" result="turbulence"/>
          <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="1.5"/>
        </filter>
        
        <!-- Rough Brush Texture -->
        <filter id="roughBrush" x="0%" y="0%" width="100%" height="100%">
          <feTurbulence baseFrequency="0.9" numOctaves="4" result="noise"/>
          <feDisplacementMap in="SourceGraphic" in2="noise" scale="2"/>
          <feGaussianBlur stdDeviation="0.5"/>
        </filter>
      </defs>
    </svg>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-background/90 backdrop-blur-sm border-b border-border/30">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center">
            <h1 class="text-2xl font-serif-heading text-foreground tracking-wide z-50">Watercoloured</h1>
          </div>
          <div class="hidden md:flex space-x-8">
            <a href="#collections" class="font-serif-body text-foreground hover:text-foreground/70 transition-colors">Collections</a>
            <a href="#murals" class="font-serif-body text-foreground hover:text-foreground/70 transition-colors">Murals</a>
            <a href="#commissions" class="font-serif-body text-foreground hover:text-foreground/70 transition-colors">Commissions</a>
            <a href="#about" class="font-serif-body text-foreground hover:text-foreground/70 transition-colors">About</a>
          </div>
          <div class="flex items-center space-x-4">
            <ShoppingCartIcon class="w-6 h-6 text-foreground cursor-pointer hover:text-foreground/70 transition-colors" />
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section ref="heroSection" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-stone-50 to-slate-100">
      
      <!-- Background Image Grid with Carousel -->
      <div class="absolute inset-0 grid grid-cols-3 gap-4 opacity-40">
        <!-- Left Column Carousel -->
        <div ref="bgImage1" class="relative overflow-hidden transform translate-y-8">
          <div ref="leftCarousel" class="relative w-full h-full">
            <img
              v-for="(src, i) in leftImages"
              :key="`left-${i}`"
              :src="src"
              alt=""
              class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
              :style="{ opacity: i === 0 ? 1 : 0 }"
            />
          </div>
          <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/20 to-white/40"></div>
        </div>
        
        <!-- Middle Column (Empty for text) -->
        <div ref="bgImage2" class="relative overflow-hidden transform -translate-y-8">
          <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/20 to-white/40"></div>
        </div>
        
        <!-- Right Column Carousel -->
        <div ref="bgImage3" class="relative overflow-hidden transform translate-y-8">
          <div ref="rightCarousel" class="relative w-full h-full">
            <img
              v-for="(src, i) in rightImages"
              :key="`right-${i}`"
              :src="src"
              alt=""
              class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
              :style="{ opacity: i === 0 ? 1 : 0 }"
            />
          </div>
          <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/20 to-white/40"></div>
        </div>
      </div>

      <!-- Main Content - Full Width Title, Centered Details -->
      <div class="relative z-10 w-full min-h-screen flex flex-col justify-center">
        <!-- Full Width Title -->
        <div class="text-center mb-12">
          <div ref="mainTitle" class="opacity-0">
            <h1 class="text-6xl z-50 md:text-8xl lg:text-9xl font-serif-heading text-slate-900 leading-none tracking-tight mb-8 lg:scale-110">
              Watercoloured
            </h1>
          </div>
        </div>
        
        <!-- Content in Middle Third -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
          <div class="grid grid-cols-3">
            <!-- Left spacer -->
            <div></div>
            
            <!-- Center content with paint splodge background -->
            <div class="flex justify-center relative">
              <!-- Paint Splodge Background -->
              <div ref="paintSplodge" class="absolute inset-0 flex items-center justify-center pointer-events-none -z-10">
                <img 
                  src="/images/effects/sm_green.png" 
                  alt="" 
                  class="w-full max-w-md h-auto object-contain mix-blend-multiply opacity-40"
                />
              </div>
              
              <div class="text-center space-y-8 relative z-10">
                <div ref="description" class="opacity-0">
                  <p class="text-base text-slate-700 leading-relaxed">
                    Bespoke art for weddings, murals, and commissions. From intimate stationery to large-scale installations, each piece captures your unique vision.
                  </p>
                </div>
                
                <div ref="ctaButtons" class="flex flex-col gap-3 opacity-0">
                  <button 
                    @click="scrollToCollections"
                    class="group relative bg-slate-900 text-white px-6 py-3 text-sm font-medium transition-all duration-300 hover:bg-slate-800"
                  >
                    View work
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-green-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                  </button>
                  <button class="border border-slate-300 text-slate-700 px-6 py-3 text-sm font-medium hover:border-slate-400 transition-colors duration-300">
                    Get in touch
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Right spacer -->
            <div></div>
          </div>
        </div>
      </div>

    </section>

    <!-- Wedding Collections Section -->
    <section id="collections" class="py-24 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
          <h2 class="text-4xl md:text-5xl font-serif-heading text-slate-900 mb-6">Wedding Collections</h2>
          <p class="text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Complete themed wedding stationery sets, each capturing the unique character of your chosen destination
          </p>
        </div>

        <!-- Wedding Items Grid -->
        <div class="mb-20">
          <h3 class="text-2xl md:text-3xl font-serif-heading text-slate-900 text-center mb-16">Complete Wedding Stationery</h3>
          
          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            
            <!-- Invitations -->
            <div ref="weddingItem1" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/valencia/sketch.jpg" 
                  alt="Wedding invitations" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Invitations</h4>
              <p class="text-sm text-slate-600">Save the dates, invites, RSVP cards</p>
            </div>

            <!-- Table Numbers -->
            <div ref="weddingItem2" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/carousel/table.jpg" 
                  alt="Table numbers" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Table Numbers</h4>
              <p class="text-sm text-slate-600">Elegant watercolor table markers</p>
            </div>

            <!-- Place Cards -->
            <div ref="weddingItem3" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/carousel/namecard.jpg" 
                  alt="Place cards" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Place Cards</h4>
              <p class="text-sm text-slate-600">Individual guest name cards</p>
            </div>

            <!-- Menu Cards -->
            <div ref="weddingItem4" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/carousel/cake.jpg" 
                  alt="Menu cards" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Cake designs</h4>
              <p class="text-sm text-slate-600">Custom wedding cake illustrations</p>
            </div>

            <!-- Seating Plans -->
            <div ref="weddingItem5" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/carousel/sm_tables.jpeg" 
                  alt="Seating plans" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Seating Plans</h4>
              <p class="text-sm text-slate-600">Large format guest seating charts</p>
            </div>

            <!-- Welcome Signs -->
            <div ref="weddingItem6" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/carousel/welcome.jpeg" 
                  alt="Welcome signs" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Welcome Signs</h4>
              <p class="text-sm text-slate-600">Ceremony and reception signage</p>
            </div>

            <!-- Placemats -->
            <div ref="weddingItem7" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/carousel/sm_plate.jpg" 
                  alt="Wedding placemats" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Placemats</h4>
              <p class="text-sm text-slate-600">Decorative dining placemats</p>
            </div>

            <!-- Programs -->
            <div ref="weddingItem8" class="group text-center opacity-0">
              <div class="bg-slate-50 aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
                <img 
                  src="/images/valencia/sm_placemats.jpeg" 
                  alt="Wedding programs" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
              </div>
              <h4 class="font-serif-body font-medium text-slate-900 mb-1">Programs</h4>
              <p class="text-sm text-slate-600">Ceremony order of service</p>
            </div>

          </div>
        </div>


      </div>
    </section>

    <!-- Murals Section -->
    <section id="murals" class="py-24 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-serif-heading text-slate-900 mb-6">Murals & Large Format</h2>
          <p class="text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed mb-8">
            Transform spaces with bespoke watercolour murals. From restaurant feature walls to children's rooms, each mural tells a unique story through hand-painted artistry.
          </p>
        </div>

        <!-- Murals Gallery -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-16">
          
          <!-- Restaurant Murals -->
          <div ref="muralItem1" class="group text-center opacity-0">
            <div class="bg-white aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
              <img 
                src="/images/murals/sm_361e793e-9404-4306-9adf-926b6731df67_rw_1200.jpg" 
                alt="Restaurant watercolor mural" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <h4 class="font-serif-body font-medium text-slate-900 mb-1">Restaurant Features</h4>
            <p class="text-sm text-slate-600">Botanical dining space murals</p>
          </div>

          <!-- Children's Murals -->
          <div ref="muralItem2" class="group text-center opacity-0">
            <div class="bg-white aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
              <img 
                src="/images/murals/39e233c0-3901-481a-a42b-d5841a7fbf6b_rw_1200.jpg" 
                alt="Children's room watercolor mural" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <h4 class="font-serif-body font-medium text-slate-900 mb-1">Children's Rooms</h4>
            <p class="text-sm text-slate-600">Whimsical watercolor scenes</p>
          </div>

          <!-- Commercial Murals -->
          <div ref="muralItem3" class="group text-center opacity-0">
            <div class="bg-white aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
              <img 
                src="/images/murals/sm_64873ffb-9139-4a11-81f0-937bb730045c_rw_3840.jpg" 
                alt="Large scale watercolor mural" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <h4 class="font-serif-body font-medium text-slate-900 mb-1">Commercial Spaces</h4>
            <p class="text-sm text-slate-600">Large-scale installations</p>
          </div>

          <!-- Bespoke Murals -->
          <div ref="muralItem4" class="group text-center opacity-0">
            <div class="bg-white aspect-[3/4] rounded-lg overflow-hidden mb-4 group-hover:shadow-md transition-shadow duration-300">
              <img 
                src="/images/murals/9a2ac34a-a8da-431e-a738-3f8a96806fac_rw_1200.jpg" 
                alt="Bespoke watercolor mural design" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <h4 class="font-serif-body font-medium text-slate-900 mb-1">Bespoke Design</h4>
            <p class="text-sm text-slate-600">Custom tailored murals</p>
          </div>

        </div>

        <!-- Call to Action -->
        <div class="text-center">
          <h3 class="text-2xl md:text-3xl font-serif-heading text-slate-900 mb-6">Ready to Transform Your Space?</h3>
          <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">
            Every mural begins with a consultation to understand your vision, space, and style. From concept sketches to final installation, we'll create something truly unique.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-slate-900 text-white px-8 py-3 text-sm font-medium hover:bg-slate-800 transition-colors duration-300">
              Request Consultation
            </button>
            <button class="border border-slate-300 text-slate-700 px-8 py-3 text-sm font-medium hover:border-slate-400 transition-colors duration-300">
              View Portfolio
            </button>
          </div>
        </div>

      </div>
    </section>

    <!-- Bespoke Art & Commissions Section -->
    <section id="commissions" class="py-24 bg-white relative overflow-hidden">
      <!-- Lightroom-style dark overlay -->
      <div ref="galleryOverlay" class="absolute inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-1000 ease-out"></div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-serif-heading text-white mb-6 transition-colors duration-1000">Bespoke Art, Commissions and Prints</h2>
          <p class="text-lg text-white max-w-3xl mx-auto leading-relaxed mb-8 transition-colors duration-1000">
            Custom artwork tailored to your vision. From portraits to landscapes, each piece is uniquely yours.
          </p>
        </div>

        <!-- Gallery Carousel -->
        <div ref="galleryCarousel" class="relative opacity-0">
          <!-- Swiper -->
          <swiper
            ref="swiperRef"
            :modules="modules"
            :slides-per-view="3"
            :space-between="40"
            :centered-slides="true"
            :loop="true"
            :speed="600"
            :free-mode="false"
            :navigation="navigationConfig"
            :pagination="paginationConfig"
            :breakpoints="breakpoints"
            :effect="'coverflow'"
            :coverflowEffect="{
              rotate: 0,
              stretch: 0,
              depth: 200,
              modifier: 1,
              slideShadows: false,
            }"
            class="gallery-swiper"
          >
            <swiper-slide 
              v-for="(image, index) in galleryImages" 
              :key="index"
            >
              <div 
                class="group relative overflow-hidden bg-white shadow-lg hover:shadow-2xl cursor-pointer w-full h-80"
                @click="slideToIndex(index)"
              >
                <img 
                  :src="image.src" 
                  :alt="image.alt" 
                  class="w-full h-full object-cover"
                />
              </div>
            </swiper-slide>
          </swiper>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-16">
          <p class="text-lg text-slate-200 mb-8 max-w-2xl mx-auto transition-colors duration-1000">
            Ready to commission a custom painting?
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-slate-900 px-8 py-3 text-sm font-medium hover:bg-slate-100 transition-colors duration-300">
              Start Your Commission
            </button>
            <button class="border border-white/60 text-white px-8 py-3 text-sm font-medium hover:border-white hover:bg-white/10 transition-all duration-300">
              View commission portfolio
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-serif-heading text-slate-900 mb-6">By Artists, For Artists</h2>
          <p class="text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed mb-8">
            We're a small studio of artists working across watercolour, acrylics, and pastels. Between us, we've got backgrounds in fine arts, 
            interior design, and home renovations—which means we get how spaces work and how art can transform them.
          </p>
        </div>

        <!-- Artist Photos Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16">
          
          <div ref="artistItem1" class="group text-center opacity-0">
            <div class="aspect-square rounded-full overflow-hidden mb-4 mx-auto max-w-48">
              <img 
                src="/images/artists/5f7123ee-9de1-4f7a-97ca-64b13cbd13c9.jpg" 
                alt="Watercolor artist" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <p class="text-sm text-slate-600">Studio Work</p>
          </div>

          <div ref="artistItem2" class="group text-center opacity-0">
            <div class="aspect-square rounded-full overflow-hidden mb-4 mx-auto max-w-48">
              <img 
                src="/images/artists/sm_IMG_1350.jpeg" 
                alt="Watercolor artist at work" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <p class="text-sm text-slate-600">Creative Process</p>
          </div>

          <div ref="artistItem3" class="group text-center opacity-0">
            <div class="aspect-square rounded-full overflow-hidden mb-4 mx-auto max-w-48">
              <img 
                src="/images/artists/sm_IMG_3799.jpeg" 
                alt="Watercolor painting process" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <p class="text-sm text-slate-600">Technique</p>
          </div>

          <div ref="artistItem4" class="group text-center opacity-0">
            <div class="aspect-square rounded-full overflow-hidden mb-4 mx-auto max-w-48">
              <img 
                src="/images/artists/sm_Screenshot_2025-08-23_at_11.52.07.jpg" 
                alt="Watercolor workspace" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
              />
            </div>
            <p class="text-sm text-slate-600">Inspiration</p>
          </div>

        </div>

        <!-- About Content -->
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <!-- <div>
            <h3 class="text-2xl font-serif-heading text-slate-900 mb-6">Our Approach</h3>
            <p class="text-slate-600 mb-4 leading-relaxed">
              We love the unpredictability of paint—whether it's watercolour bleeding in unexpected ways, 
              acrylics building up rich textures, or pastels creating that perfect soft edge. Each medium 
              has its own personality, and we choose what works best for your project.
            </p>
            <p class="text-slate-600 leading-relaxed">
              Whether we're painting your dog, designing your wedding stationery, or covering an entire wall, 
              we're always chasing that perfect moment when everything just clicks.
            </p>
          </div>
          <div>
            <h3 class="text-2xl font-serif-heading text-slate-900 mb-6">What We're About</h3>
            <ul class="space-y-3">
              <li class="flex items-start">
                <span class="text-blue-600 mr-3 mt-1">•</span>
                <span class="text-slate-600">We actually paint every day (seriously, our hands are permanently stained)</span>
              </li>
              <li class="flex items-start">
                <span class="text-blue-600 mr-3 mt-1">•</span>
                <span class="text-slate-600">Coffee chats before we start any project—we want to get it right</span>
              </li>
              <li class="flex items-start">
                <span class="text-blue-600 mr-3 mt-1">•</span>
                <span class="text-slate-600">Good paper, good paint—we don't mess around with materials</span>
              </li>
              <li class="flex items-start">
                <span class="text-blue-600 mr-3 mt-1">•</span>
                <span class="text-slate-600">We'll send you progress photos because we get excited about this stuff</span>
              </li>
            </ul>
          </div> -->
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-100 py-16 border-t border-stone-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
          
          <!-- Brand -->
          <div class="md:col-span-2">
            <h3 class="text-3xl font-serif-heading mb-4 text-slate-800">Watercoloured</h3>
            <!-- <p class="text-slate-600 leading-relaxed mb-6">
              Hand-painted watercolor artwork for life's special moments. Each piece is lovingly created to capture the beauty and emotion of your most treasured memories.
            </p> -->
            <div class="flex space-x-4">
              <!-- <p class="text-slate-500 text-sm italic">Where art meets heart</p> -->
            </div>
          </div>

          <!-- Services -->
          <div>
            <h4 class="font-serif-body font-semibold mb-4 text-slate-800">Our Work</h4>
            <ul class="space-y-3 text-sm text-slate-600">
              <li><a href="#collections" class="hover:text-slate-800 transition-colors duration-200">Wedding Stationery</a></li>
              <li><a href="#murals" class="hover:text-slate-800 transition-colors duration-200">Murals & Installations</a></li>
              <li><a href="#commissions" class="hover:text-slate-800 transition-colors duration-200">Custom Commissions</a></li>
              <li><a href="#about" class="hover:text-slate-800 transition-colors duration-200">About the Artist</a></li>
            </ul>
          </div>

          <!-- Contact -->
          <div>
            <h4 class="font-serif-body font-semibold mb-4 text-slate-800">Let's Create</h4>
            <p class="text-slate-600 text-sm mb-4">Have an idea you'd like to bring to life?</p>
            <button class="bg-slate-800 hover:bg-slate-700 text-white px-6 py-3 text-sm font-serif-body transition-colors duration-300 border border-slate-800 hover:border-slate-700">
              Get in Touch
            </button>
            <div class="mt-6 text-slate-500 text-sm">
              <p class="mb-1">Based in the UK</p>
              <p>Creating worldwide</p>
            </div>
          </div>

        </div>

        <!-- Copyright -->
        <div class="border-t border-stone-200 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
          <p class="text-slate-500 text-sm">
            © 2025 Watercoloured. All rights reserved.
          </p>
          <div class="flex space-x-6 mt-4 md:mt-0 text-slate-500 text-sm">
            <a href="/privacy-policy" class="hover:text-slate-700 transition-colors">Privacy Policy</a>
            <a href="/terms-of-service" class="hover:text-slate-700 transition-colors">Terms of Service</a>
          </div>
        </div>

      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { ShoppingCartIcon } from 'lucide-vue-next'
// Swiper imports
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination, EffectCoverflow } from 'swiper/modules'
// Swiper styles
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'swiper/css/effect-coverflow'

gsap.registerPlugin(ScrollTrigger)

// Configuration
const CAROUSEL_ENABLED = true // Set to false to disable carousel

// Refs
const heroSection = ref<HTMLElement>()
const bgImage1 = ref<HTMLElement>()
const bgImage2 = ref<HTMLElement>()
const bgImage3 = ref<HTMLElement>()
const leftCarousel = ref<HTMLElement>()
const rightCarousel = ref<HTMLElement>()
const mainTitle = ref<HTMLElement>()
const description = ref<HTMLElement>()
const ctaButtons = ref<HTMLElement>()
const paintSplodge = ref<HTMLElement>()
const weddingItem1 = ref<HTMLElement>()
const weddingItem2 = ref<HTMLElement>()
const weddingItem3 = ref<HTMLElement>()
const weddingItem4 = ref<HTMLElement>()
const weddingItem5 = ref<HTMLElement>()
const weddingItem6 = ref<HTMLElement>()
const weddingItem7 = ref<HTMLElement>()
const weddingItem8 = ref<HTMLElement>()
const muralItem1 = ref<HTMLElement>()
const muralItem2 = ref<HTMLElement>()
const muralItem3 = ref<HTMLElement>()
const muralItem4 = ref<HTMLElement>()
const artistItem1 = ref<HTMLElement>()
const artistItem2 = ref<HTMLElement>()
const artistItem3 = ref<HTMLElement>()
const artistItem4 = ref<HTMLElement>()
// Gallery refs
const galleryCarousel = ref<HTMLElement>()
const galleryOverlay = ref<HTMLElement>()
const swiperRef = ref<any>()

// Swiper configuration
const modules = [Navigation, Pagination, EffectCoverflow]

const navigationConfig = {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
}

const paginationConfig = {
  clickable: true,
  dynamicBullets: false,
}

const breakpoints = {
  640: {
    slidesPerView: 1,
    spaceBetween: 20,
  },
  768: {
    slidesPerView: 2,
    spaceBetween: 30,
  },
  1024: {
    slidesPerView: 3,
    spaceBetween: 40,
  },
}

// Hero carousel images from resources/images/carousel directory
const discoveredImages = Object.values(
  import.meta.glob('../../images/carousel/*.{jpg,jpeg,png,webp}', {
    eager: true,
    as: 'url'
  })
) as string[]

// Fallback to storage URLs if no images found in resources
const allCarouselImages: string[] = discoveredImages.length
  ? discoveredImages
  : [
      '/images/valencia/sm_placemats.jpeg',
      '/images/valencia/a3poster.jpg',
      '/images/valencia/sm_tables.jpeg',
      '/images/valencia/sketch.jpg'
    ]

const leftImages = ref<string[]>([])
const rightImages = ref<string[]>([])

// Split evenly: left gets the extra one if odd
if (allCarouselImages.length) {
  const mid = Math.ceil(allCarouselImages.length / 2)
  leftImages.value = allCarouselImages.slice(0, mid)
  rightImages.value = allCarouselImages.slice(mid)
  // If right is empty (e.g., only 1 image), mirror left so both columns show something
  if (!rightImages.value.length) rightImages.value = leftImages.value
}

// Gallery images - autoloaded from gallery folder
const galleryImages = ref([
  { src: '/images/gallery/sm_IMG_7005.jpg', alt: 'Watercolor artwork 1' },
  { src: '/images/gallery/sm_IMG_7042.jpg', alt: 'Watercolor artwork 2' },
  { src: '/images/gallery/sm_IMG_7068.jpg', alt: 'Watercolor artwork 3' },
  { src: '/images/gallery/sm_IMG_7078.jpg', alt: 'Watercolor artwork 4' },
  { src: '/images/gallery/sm_IMG_7098.jpg', alt: 'Watercolor artwork 5' },
  { src: '/images/gallery/sm_IMG_7108.jpg', alt: 'Watercolor artwork 6' },
  { src: '/images/gallery/sm_IMG_7111.jpg', alt: 'Watercolor artwork 7' },
  { src: '/images/gallery/sm_IMG_7115.jpg', alt: 'Watercolor artwork 8' },
  { src: '/images/gallery/sm_IMG_7117.jpg', alt: 'Watercolor artwork 9' },
  { src: '/images/gallery/sm_IMG_7123.jpg', alt: 'Watercolor artwork 10' },
  { src: '/images/gallery/sm_IMG_7133.jpg', alt: 'Watercolor artwork 11' }
])


onMounted(() => {
  // Create main animation timeline
  const tl = gsap.timeline()
  
  // Background image animations (parallax effect)
  gsap.to([bgImage1.value, bgImage3.value], {
    y: -50,
    duration: 2,
    ease: "power2.out",
    scrollTrigger: {
      trigger: heroSection.value,
      start: "top bottom",
      end: "bottom top",
      scrub: 1
    }
  })
  
  gsap.to(bgImage2.value, {
    y: 30,
    duration: 2,
    ease: "power2.out",
    scrollTrigger: {
      trigger: heroSection.value,
      start: "top bottom", 
      end: "bottom top",
      scrub: 1
    }
  })
  
  // Carousel functionality
  const startCarousels = () => {
    const fadeStack = (containerEl: HTMLElement, intervalMs = 8000, initialDelay = 0) => {
      if (!containerEl) return
      const slides = Array.from(containerEl.querySelectorAll('img')) as HTMLImageElement[]
      if (slides.length <= 1) return // nothing to cycle

      let index = 0
      // Ensure only the first is visible
      slides.forEach((el, i) => gsap.set(el, { opacity: i === 0 ? 1 : 0 }))

      const tick = () => {
        const current = slides[index]
        const next = slides[(index + 1) % slides.length]
        gsap.to(current, { opacity: 0, duration: 1, ease: 'power2.inOut' })
        gsap.to(next, { opacity: 1, duration: 1, ease: 'power2.inOut' })
        index = (index + 1) % slides.length
      }

      setTimeout(() => {
        tick()
        setInterval(tick, intervalMs)
      }, initialDelay)
    }

    // Left & right (staggered start)
    fadeStack(leftCarousel.value as HTMLElement, 8000, 0)
    fadeStack(rightCarousel.value as HTMLElement, 8000, 2000)
  }
  
  // Main content animations with upward movement
  tl.fromTo(mainTitle.value, 
    { opacity: 0, y: 60, force3D: true },
    { opacity: 1, y: 0, duration: 1.5, ease: "power3.out", force3D: true }
  )
  
  // Set paint splodge to static visible state
  if (paintSplodge.value) {
    gsap.set(paintSplodge.value, { opacity: 1, y: 0, force3D: true })
  }
  
  tl.fromTo(description.value,
    { opacity: 0, y: 40, force3D: true },
    { opacity: 1, y: 0, duration: 1.2, ease: "power3.out", force3D: true }, "-=1.5"
  )
  .fromTo(ctaButtons.value,
    { opacity: 0, y: 30, force3D: true },
    { opacity: 1, y: 0, duration: 1, ease: "power3.out", force3D: true }, "-=0.8"
  )
  
  // Start carousels after initial load (only if enabled)
  if (CAROUSEL_ENABLED) {
    setTimeout(startCarousels, 2000)
  } else {
    const initStack = (containerEl?: HTMLElement | null) => {
      if (!containerEl) return
      const slides = Array.from(containerEl.querySelectorAll('img')) as HTMLImageElement[]
      slides.forEach((el, i) => gsap.set(el, { opacity: i === 0 ? 1 : 0 }))
    }
    initStack(leftCarousel.value)
    initStack(rightCarousel.value)
  }
  
  // Wedding items animation
  const weddingItems = [
    weddingItem1.value, weddingItem2.value, weddingItem3.value, weddingItem4.value,
    weddingItem5.value, weddingItem6.value, weddingItem7.value, weddingItem8.value
  ]
  
  gsap.fromTo(weddingItems, 
    { opacity: 0, y: 40, force3D: true },
    {
      opacity: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.1,
      ease: "power3.out",
      force3D: true,
      scrollTrigger: {
        trigger: weddingItem1.value,
        start: "top bottom-=100",
        toggleActions: "play none none reverse"
      }
    }
  )
  
  // Mural items animation
  const muralItems = [
    muralItem1.value, muralItem2.value, muralItem3.value, muralItem4.value
  ]
  
  gsap.fromTo(muralItems, 
    { opacity: 0, y: 40, force3D: true },
    {
      opacity: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.15,
      ease: "power3.out",
      force3D: true,
      scrollTrigger: {
        trigger: muralItem1.value,
        start: "top bottom-=100",
        toggleActions: "play none none reverse"
      }
    }
  )
  
  // Artist items animation
  const artistItems = [
    artistItem1.value, artistItem2.value, artistItem3.value, artistItem4.value
  ]
  
  gsap.fromTo(artistItems, 
    { opacity: 0, y: 40, force3D: true },
    {
      opacity: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.2,
      ease: "power3.out",
      force3D: true,
      scrollTrigger: {
        trigger: artistItem1.value,
        start: "top bottom-=100",
        toggleActions: "play none none reverse"
      }
    }
  )
  
  // Gallery carousel animation
  gsap.fromTo(galleryCarousel.value, 
    { opacity: 0, y: 60, force3D: true },
    {
      opacity: 1,
      y: 0,
      duration: 1.5,
      ease: "power2.inOut",
      force3D: true,
      scrollTrigger: {
        trigger: galleryCarousel.value,
        start: "top bottom-=150",
        toggleActions: "play none none reverse"
      }
    }
  )
  
  // Lightroom-style fade to black on cue
  gsap.to(galleryOverlay.value, {
    opacity: 0.875,
    duration: 1.2,
    ease: "power2.out",
    scrollTrigger: {
      trigger: galleryCarousel.value,
      start: "top bottom-=100",
      toggleActions: "play reverse play reverse"
    }
  })
})

// Swiper slide to index function
const slideToIndex = (index: number) => {
  if (swiperRef.value) {
    // Try different ways to access swiper instance
    const swiper = swiperRef.value.swiper || swiperRef.value.$el?.swiper
    if (swiper) {
      // Use slideToLoop for looped carousels to handle correct indexing
      swiper.slideToLoop(index)
    }
  }
}

const scrollToCollections = () => {
  const collectionsEl = document.getElementById('collections')
  if (collectionsEl) {
    gsap.to(window, {
      duration: 1.5,
      scrollTo: { y: collectionsEl.offsetTop - 80 },
      ease: "power3.inOut"
    })
  }
}
</script>