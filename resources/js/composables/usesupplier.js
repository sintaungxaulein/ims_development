import { useForm } from "@inertiajs/inertia-vue3";

export default (perPage = 15) => {
    const form = useForm({
        per_page: perPage,
    });

    const getsuppliers = () => {
        form.get(route("suppliers.index"), {
            onFinish: () => { },
        });
    };

    return { getsuppliers };
}
