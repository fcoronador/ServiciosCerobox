<template>
  <div class="card col-3 mx-3">
    <img class="card-img" :src="servicio.img" width="200px" alt="" />
    <div class="card-body">
      <h4 class="card-title">{{ servicio.nombre }} CC:{{ servicio.cedula }}</h4>
      <p class="card-text">
        <strong>ID:</strong>{{ servicio.id }}
        <br>
        <strong>Correo:</strong>{{ servicio.correo }}
        <br>
        <strong>Télefono:</strong>{{ servicio.telefono }}
        <br>
        <strong>Observaciones:</strong>{{ servicio.obser }}
        <br>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    servicio: {
      type: Object,
    },
  },
};
</script>
