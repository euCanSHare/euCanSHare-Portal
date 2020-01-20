import { useEffect, useState } from 'react';
import { getForm } from '../../../api/hubspotPluginApi';

export default function useForm(id) {
  const [loading, setLoading] = useState(true);
  const [form, setForm] = useState(null);

  useEffect(() => {
    if (!id) {
      setForm(null);
      setLoading(false);
    } else {
      getForm(id)
        .then(response => {
          setForm(response);
          setLoading(false);
        })
        .catch(error => {
          setLoading(false);
          console.error(error);
        });
    }
  }, [id]);

  return { loading, form };
}
