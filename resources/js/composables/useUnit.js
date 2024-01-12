import { useForm } from "@inertiajs/inertia-vue3";

export default (perPage = 15) => {
    const form = useForm({
        per_page: perPage,
    });

    const getunits = () => {
        form.get(route("units.index"), {
            onFinish: () => { },
        });
    };

    return { getunits };
}
