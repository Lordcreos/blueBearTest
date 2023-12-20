<script setup>
  import { Link, useForm } from '@inertiajs/inertia-vue3';

  const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  });
  const register = () => {
    form.post("/auth/register", {
      onSuccess: () => {
        location.href = "/login";
      }
    });
  }
</script>
<template>
  <TitleHead  :title="'Registro'"/>
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
            Registro
          </h1>
          <form class="space-y-4 md:space-y-6" @submit.prevent="register()">
            <div>
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
              <input type="name" name="name" v-model="form.name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <div v-if="form.errors.name" class="text-sm text-red-400">{{ form.errors.name }}</div>
            </div>
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
              <input type="email" name="email" v-model="form.email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <div v-if="form.errors.email" class="text-sm text-red-400">{{ form.errors.email }}</div>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
              <input type="password" autocomplete="off" v-model="form.password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <div v-if="form.errors.password" class="text-sm text-red-400">{{ form.errors.password }}</div>
            </div>
            <div>
              <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repetir contraseña</label>
              <input type="password" autocomplete="off" v-model="form.password_confirmation" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <div v-if="form.errors.password_confirmation" class="text-sm text-red-400">{{ form.errors.password_confirmation }}</div>
            </div>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrarme</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Ya tienes una cuenta? <Link href="/login" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Iniciar sesión</Link>
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