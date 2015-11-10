
#wp post delete $(wp post list --post_status=trash --format=ids)
wp post delete $(wp post list --format=ids)
