<script setup>
  import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';

  const page = usePage()
  const form = useForm({
    email: '',
    password: ''
  });
  const login = () => {
      form.post("/auth/login", {
        onSuccess: (e) => {
          localStorage.setItem('token', e.props.flash.message);
          location.href = "/";
        }
      });
  }
</script>
<template>
  <TitleHead  :title="'Login'"/>
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <div v-if="$page.props.flash.message" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
              {{ $page.props.flash.message }}
            </div>
          </div>
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
            Inicia sesión
          </h1>
          <form class="space-y-4 md:space-y-6" @submit.prevent="login()">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
              <input type="email" name="email" id="email" v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <div v-if="form.errors.email" class="text-sm text-red-400">{{ form.errors.email }}</div>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
              <input type="password" autocomplete="off" v-model="form.password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <div v-if="form.errors.email" class="text-sm text-red-400">{{ form.errors.password  }}</div>
            </div>
            <button type="submit" :disabled="form.processing" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ingresar</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              No tienes una cuenta? <Link href="/register" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Registrarme</Link>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
  export default {
   layout: null 
  }
</script>