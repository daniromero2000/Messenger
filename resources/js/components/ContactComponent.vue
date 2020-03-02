<template>
    <b-list-group-item>
        <b-row  aling-h="center">
            <b-col cols="3" mb="3" class="text-center">
                <b-img
                    blank
                    width="48"
                    height="48"
                    rounded="circle"
                    blank-color="#777"
                    class="mt-1"
                    alt="Circle image"
                ></b-img>
            </b-col>
            <b-col cols="6" aling-self="center" class="d-none d-md-block">
                <p class="mb-1">Daniel Romero</p>
                <p class="text-muted small mb-1">Tù: Hata luego</p>
            </b-col>
            <b-col cols="3" class="d-none d-md-block">
                <p class="text-muted small">1: 37 pm</p>
            </b-col>
        </b-row>
    </b-list-group-item>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
