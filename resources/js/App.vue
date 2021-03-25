<template>
<div>
    <b-navbar type="dark" variant="dark">
    <b-navbar-nav>
      <b-nav-item href="/">Home</b-nav-item>
      <b-nav-item href="/viewmarks">View Marks</b-nav-item>
      <b-nav-item href="/add">Add New Student</b-nav-item>
      <b-nav-item href="/addmarks">Add Marks</b-nav-item>
      <b-nav-item href="/winners">View Winners</b-nav-item>
       
</b-navbar-nav>
</b-navbar>


        <div>
        <router-view></router-view>
        </div>
</div>
</template>

<script>

export default ({
  
})
</script>
