import { useForm } from "@inertiajs/inertia-vue3";

export default (perPage = 15) => {
    const form = useForm({
        per_page: perPage,
    });

    const getitems = () => {
        form.get(route("items.index"), {
            onFinish: () => { },
        });
    };

    return { getitems };
}
