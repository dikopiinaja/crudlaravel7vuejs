<template>
  <div class="page">
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <router-link :to="{ name: 'home' }" class="navbar-brand"
          >Kunsarifan</router-link
        >
        <router-link :to="{ name: 'student' }" class="navbar-brand"
          >Student</router-link
        >
        <router-link :to="{ name: 'subject' }" class="navbar-brand"
          >Subject</router-link
        >
        <router-link :to="{ name: 'score' }" class="navbar-brand"
          >Score</router-link
        >
      </div>
    </nav>
    <router-view></router-view>
  </div>
</template>