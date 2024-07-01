<script>
import Button from "@/components/ui/button/Button.vue";
import { router, useForm, Link } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";
import { Input } from "@/components/ui/input";
import axios from "axios";

export default defineComponent({
    name: "Users",
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    components: {
        Button,
        Input,
        Link,
    },
    setup() {
        const form = useForm({
            name: "",
            password: "",
            email: "",
            country: "",
            streetAddress: "",
            neighborhood: "",
            city: "",
            region: "",
            postalCode: "",
        });

        const handleSubmit = () => {
            form.post(route("users.store"), {
                onSuccess: () => {
                    console.log("success");
                },
                onError: (error) => {
                    console.log("error on submit");
                    console.log("Erro:", TypeError, error);
                },
                onFinish: () => {},
            });
        };

        const zipCodeFormatting = (event) => {
            let value = event.target.value.replace(/\D/g, "");

            if (value.length > 5) {
                value = value.slice(0, 5) + "-" + value.slice(5);
            }
            form.postalCode = value;
            searchCEP(value);
        };

        const searchCEP = (valueCEP) => {
            axios
                .get(`https://viacep.com.br/ws/${valueCEP}/json/`)
                .then((response) => {
                    form.neighborhood = response.data.bairro;
                    form.city = response.data.localidade;
                    form.region = response.data.uf;
                    form.country = "Brazil";
                    form.streetAddress = response.data.logradouro;
                })
                .catch((error) => {
                    console.log(error);
                });
        };

        return {
            form,
            handleSubmit,
            zipCodeFormatting,
            searchCEP,
        };
    },
});
</script>

<template>
    
    <h1>{{ user.name }}</h1>
    <p>{{ user.email }}</p>
</template>
