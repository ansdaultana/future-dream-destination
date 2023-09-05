<template>
    <div class="slider-container">
      <div class="slider bg-black"> <!-- Set a fixed background color here -->
        <transition name="slide" mode="out-in">
          <img :key="currentIndex" :src="currentImage" class="  h-auto  md:h-screen w-full slider-image" alt="Slider Image">
        </transition>
      
        <div class="nav-buttons  flex justify-between items-center">
          <button @click="prevImage" class=" rounded-full m-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-white h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
              
          </button>
          <button @click="nextImage" class="nav-button m-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-white h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
              
          </button>
        </div>
        <div class="indicator-dots hidden md:flex absolute bottom-10 left-0 right-0  justify-center">
          <span
            v-for="(image, index) in images"
            :key="index"
            class="dot mx-1 w-2 h-2 rounded-full transition-background duration-300"
            :class="{ 'bg-white': currentIndex === index, 'bg-black': currentIndex !== index }"
            @click="goToImage(index)"
          ></span>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
  
  const images = ref([
    '/HomePage.jpg',
    '/wallpaper.jpg',
    '/wallp.jpg'
  ]);
  
  const currentIndex = ref(0);
  
  const currentImage = computed(() => images.value[currentIndex.value]);
  
  const prevImage = () => {
    currentIndex.value = (currentIndex.value - 1 + images.value.length) % images.value.length;
  };
  
  const nextImage = () => {
    currentIndex.value = (currentIndex.value + 1) % images.value.length;
  };
  
  const goToImage = (index) => {
    currentIndex.value = index;
  };
  
  onMounted(() => {
    const autoChangeInterval = setInterval(nextImage, 3000);
  
    onBeforeUnmount(() => {
      clearInterval(autoChangeInterval);
    });
  });
  </script>
  
  <style scoped>
  .indicator-dots .dot {
    background-color: #000;
  }
  
  .indicator-dots .dot.bg-white {
    background-color: #fff;
  }
  .nav-buttons {
    display: flex;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    width: 100%;
  }
  
.slide-enter-active, .slide-leave-active {
    transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
  }
  
  .slide-enter, .slide-leave-to {
    opacity: 0;
    transform: translateX(-20px);
  }
  
  .slide-enter-to, .slide-leave {
    opacity: 1;
    transform: translateX(0);
  }
  .slider {
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}

.slider.hidden {
    opacity: 0;
    pointer-events: none; 
    
}
  </style>
  