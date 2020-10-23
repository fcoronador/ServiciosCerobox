<template>
  <div class="my-form">
    <form class="ui form">
      <div class="fields">
        <div class="four wide field">
          <label>Nombre</label>
          <input
            type="text"
            name="nombre"
            placeholder="nombre"
            @change="handleChange"
            :value="form.nombre"
          />
        </div>

        <div class="four wide field">
          <span>Tipo de Servicio</span>
          <label>Básico</label>
          <input
            type="radio"
            name="Tservcio"
            @change="handleChange"
            value="1"
          />
          <label>Avanzado</label>
          <input
            type="radio"
            name="Tservcio"
            @change="handleChange"
            value="0"
          />
        </div>

        <div class="four wide field">
          <label>Fecha de Inicio</label>
          <input
            type="date"
            name="FechaIni"
            @change="handleChange"
            :value="form.FechaIni"
          />
        </div>
        <div class="four wide field">
          <label>Fecha de Finalización</label>
          <input
            type="date"
            name="FechaFin"
            @change="handleChange"
            :value="form.FechaFin"
          />
        </div>
         <div class="four wide field">
          <label>Observación</label>
          <input
            type="text"
            name="obser"
            placeholder="Observaciones"
            @change="handleChange"
            :value="form.obser"
          />
        </div>
         <div class="four wide field">
          <label>Imagen</label>
          <input
            type="text"
            name="img"
            placeholder="Url de la imagen"
            @change="handleChange"
            :value="form.img"
          />
        </div>
        <div class="two wide field">
          <button :class="btnClass" @click="onFormSubmit">
            {{ btnName }}
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "Form",
  data() {
    return {
      btnName: "Guardar",
      btnClass: "ui primary button submit-button"
    };
  },
  props: {
    form: {
      type: Object
    }
  },
  methods: {
    handleChange(event) {
      const { name, value } = event.target;
      let form = this.form;
      form[name] = value;
      this.form = form;
    },
    onFormSubmit(event) {
      // prevent form submit
      event.preventDefault();

      // form validation
      if (this.formValidation()) {
        // window.console.log("ready to submit");
        this.$emit("onFormSubmit", this.form);

        // change the button to save
        this.btnName = "Guardar";
        this.btnClass = "ui primary button submit-button";

        // clear form fields
        this.clearFormFields();
      }
    },
    formValidation() {
      // first name
      if (document.getElementsByName("nombre")[0].value === "") {
        alert("Ingresa un nombre");
        return false;
      }

     
      if (document.getElementsByName("Tservcio")[0].value === "") {
        alert("Ingresa una opción de servicio");
        return false;
      }
      if (document.getElementsByName("FechaIni")[0].value === "") {
        alert("Ingresa una Fecha Inicio");
        return false;
      }
      if (document.getElementsByName("FechaFin")[0].value === "") {
        alert("Ingresa una Fecha de finalización");
        return false;
      }
      if (document.getElementsByName("obser")[0].value === "") {
        alert("Ingresa una observación");
        return false;
      }
      if (document.getElementsByName("img")[0].value === "") {
        alert("Ingresa una url");
        return false;
      }

     

      return true;
    },
    clearFormFields() {
      // clear form data
      this.form.nombre = "";
      this.form.Tservcio = "";
      this.form.FechaIni = "";
      this.form.FechaFin = "";
      this.form.obser = "";
      this.form.img = "";
      
      this.form.isEdit = false;

      // clear form fields
      document.querySelector(".form").reset();
    }
  },
  updated() {
    if (this.form.isEdit) {
      this.btnName = "Actualizar";
      this.btnClass = "ui orange button submit-button";
    }
  }
};
</script>

