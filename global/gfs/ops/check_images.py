import os
import datetime
import time

type_nimages_dict = {
    'grid2grid': 49500,
    'grid2obs': 161640
}
PDY_dt = datetime.datetime.today()
PDY = PDY_dt.strftime('%Y%m%d')

for type in list(type_nimages_dict.keys()):
    type_images_list = os.listdir(os.path.join(type, 'images'))
    nimages = len(type_images_list)
    # Check number
    if nimages != type_nimages_dict[type]:
        print(type+" number of images ("+str(nimages)+") "
              +"does not match expected ("+str(type_nimages_dict[type])+")")
    # Check dates
    for type_image in type_images_list:
        type_image_time = datetime.datetime.fromtimestamp(
            os.path.getmtime(os.path.join(type, 'images', type_image))
        )
        if type_image_time.strftime('%Y%m%d') != PDY:
            print(os.path.join(type, 'images', type_image)+" last updated on "
                  +str(type_image_time))
