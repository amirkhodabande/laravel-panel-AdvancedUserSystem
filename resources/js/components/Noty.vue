<template>

</template>

<script>
import swal from "sweetalert";
export default {
      created() {
            window.events.$on("notification", (payload) => {
                  swal({
                        title: payload.title,
                        text: payload.text,
                        icon: payload.icon,
                        button: payload.button,
                  });
            });
      },
};
</script>
